<?php

namespace App\Http\Controllers\Back;

use App\Http\Services\UserService;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     *  Display a listing of the resource.
     * @param null $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($type = null)
    {
        $this->data('title',$this->title('Users'));
        if (empty($type)) {
            $users = $this->userService->users();
        }
        return view(
            'back.pages.administration.users.users',
            $this->data, compact('users')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data('title',$this->title('Add User'));
        $roles = Role::all();
        return view(
            'back.pages.administration.users.new-user',
            $this->data, compact('roles')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->userValidation($request);
        if($this->userService->userStore($request->all())){
            return redirect()->route('users.index')->with('success','User has been successfully inserted');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $generalInfo = $this->userService->userShow($id);
        $this->data('title',$this->title($id));
        return view(
            'back.pages.administration.users.profile',
            $this->data, compact('generalInfo')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function userValidation($request)
    {
        return $this->validate($request,
            [
                'name'      => 'required',
                'email'     => 'required|unique:users',
                'password'  => 'required|min:6',
                'phone'     => 'required',
                'position'  => 'required',
                'branch'    => 'required',
                'role'      => 'required'
            ]
        );
    }
    public function search(Request $request)
    {
        $this->data('title',$this->title('Users'));

        $search = $request->search;

            if($users = User::where('name','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%')
                ->orWhere('phone','like','%'.$search.'%')
                ->orWhere('position','like','%'.$search.'%')
                ->orWhere('branch','like','%'.$search.'%')
                ->paginate(1))
            {
                $hold = 'value';
            }

        return view(
            'back.pages.administration.users.users',
            $this->data, compact('users','hold')
        );
    }
}
