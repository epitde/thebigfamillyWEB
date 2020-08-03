<?php

namespace App\services\UserDocuments;

use App\facade\ImageFacade;
use App\facade\UserFacade;
use App\Models\UserDocument;

class UserDocumentService
{
    protected $user_document;

    public function __construct()
    {
        $this->user_document = new UserDocument();
    }

    /**
     * Get all user_documents from database
     */
    public function getAll()
    {
        return $this->user_document->all();
    }

    /**
     * Get a single user_document from database
     */
    public function get($id)
    {
        return $this->user_document->find($id);
    }

    /**
     * Create user_document object and save in database
     */
    public function create($data)
    {
        return $this->user_document->create($data);
    }

    /**
     * Delete user_document object from database
     */
    public function delete($id)
    {
        $user_document = $this->get($id);

        $user_document->delete();
    }

    public function update(UserDocument $user_document, array $data)
    {
        //Update object with given data
        return $user_document->update($this->edit($user_document, $data));
    }

    protected function edit(UserDocument $user_document, $data)
    {
        //convert object attributes to array and merge with updated array
        return array_merge($user_document->toArray(), $data);
    }

    public function uploadForms($user_id, $request)
    {
        $request['user_id'] = $user_id;

        $this->uploadVerificationForm($request);
        $this->uploadGovtID($request);

        $profile = UserFacade::get($user_id)->generalProfile ? UserFacade::get($user_id)->generalProfile : UserFacade::get($user_id)->organizationProfile;
        if ($profile) {
            $profile->status = 1;
            $profile->save();
        }

        $this->uploadOtherDocs($request);
    }

    public function uploadVerificationForm($request)
    {
        if ($request->has('verification')) {
            $request['name'] = ImageFacade::upFile($request->file('verification'))['data'];
            $request['type'] = UserDocument::TYPE['VERIFICATION'];
            return $this->create($request->all());
        }
    }

    public function uploadGovtID($request)
    {
        if ($request->has('govt')) {
            $request['name'] = ImageFacade::upFile($request->file('govt'))['data'];
            $request['type'] = UserDocument::TYPE['GOVT'];
            return $this->create($request->all());
        }
    }

    public function uploadOtherDocs($request)
    {
        if ($request->has('govt')) {
            foreach ($request->file('other') as $doc) {
                $request['name'] = ImageFacade::upFile($doc)['data'];
                $request['type'] = UserDocument::TYPE['OTHERS'];
                $this->create($request->all());
            }
        }
    }
}
