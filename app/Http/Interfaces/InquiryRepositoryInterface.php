<?php
/**
 * Created by PhpStorm.
 * User: The Power Monkey
 * Date: 9/7/2018
 * Time: 11:25 AM
 */

namespace App\Http\Interfaces;

interface InquiryRepositoryInterface extends RepositoryInterface
{
    /**
     * Display list of all Inquiry
     * @return mixed
     */
    public function index($value = null);

    /**
     * Store a newly created resource in storage.
     * @param $data
     * @return mixed
     */
    public function storeBasicInformation($data);

    /**
     * Show the detail of resource
     * @param $token
     * @return mixed
     */
    public function showInquiryDetail($token);

    /**
     * @param array $data
     * @param $token
     * @return mixed
     */
    public function updatePersonalInformation(array $data, $token);

    /**
     * @param array $data
     * @param $token
     * @return mixed
     */
    public function updateInterest(array $data, $token);
    /**
     * @param array $data
     * @param $token
     * @return mixed
     */
    public function updateEnglishProficiencyTests(array $data, $token);

    /**
     * @param array $data
     * @param $token
     * @return mixed
     */
    public function updateHistory(array  $data, $token);

    /**
     * @param array $data
     * @return mixed
     */
    public function academicDetailCreate(array $data);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function academicDetailUpdate(array $data, $id);

    /**
     * @param array $data
     * @return mixed
     */
    public function experienceCreate(array $data);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function experienceUpdate(array $data, $id);

    public function destroy($token);
}