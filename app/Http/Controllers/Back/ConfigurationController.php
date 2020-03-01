<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigurationController extends Controller
{
    public function index()
    {
        $envFile = app()->environmentFilePath();

        $this->data('title',$this->title('Pusher Configuration'));

        $str = file_get_contents($envFile);

        return view(
            'back.pages.administration.configuration.configuration',
            compact('str'),
            $this->data
        );
    }
    public function createPusher()
    {
        $this->data('title',$this->title('Pusher Configuration'));

        return view(
            'back.pages.administration.configuration.pusher-configuration',
            $this->data
        );
    }

    public function storePusher(Request $request)
    {
        $this->validate($request,
            [
                'BROADCAST_DRIVER'      => 'required',
                'PUSHER_APP_ID'         => 'required',
                'PUSHER_APP_KEY'        => 'required',
                'PUSHER_APP_SECRET'     => 'required',
                'PUSHER_APP_CLUSTER'    => 'required'
            ]);
        $data = $request->all();
        unset($data['_token']);

        foreach ($data as $key=>$value)
        {
            $this->setEnvironmentValue($key, $value);
        }

        return redirect()->route('env.show')->with('success','Env file has been changed');
    }

    public function createMail()
    {
        $this->data('title',$this->title('Mail Configuration'));

        return view(
            'back.pages.administration.configuration.mail-setup.mail-configuration',
            $this->data
        );
    }

    public function storeMail(Request $request)
    {
        $this->validate($request,
            [
                'MAIL_DRIVER'      => 'required',
                'MAIL_HOST'         => 'required',
                'MAIL_PORT'        => 'required',
                'MAIL_USERNAME'     => 'required',
                'MAIL_PASSWORD'    => 'required',
                'MAIL_ENCRYPTION'   => 'required'
            ]);
        $data = $request->all();
        unset($data['_token']);

        foreach ($data as $key=>$value)
        {
            $this->setEnvironmentValue($key, $value);
        }

        return redirect()->route('env.show')->with('success','Env file has been changed');
    }

    /**
     * @param $envKey
     * @param $envValue
     * @return bool
     */
    protected function setEnvironmentValue($envKey, $envValue)
    {
        $envFile = app()->environmentFilePath();

        $str = file_get_contents($envFile);

        $oldValue = env(trim($envKey));

        $str = str_replace("{$envKey}={$oldValue}", "{$envKey}={$envValue}", $str);

        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);
        return true;
    }
}
