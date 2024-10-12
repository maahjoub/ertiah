<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\AttachFilesTrait;

class SettingController extends Controller
{
    use AttachFilesTrait;
    public function index()
    {
        $collections = Setting::all();
        $setting['settings'] = $collections->flatMap(function ($collections) {
            return [$collections->key => $collections->value];
        });
        // return $setting;
        return view('pages.Settings.index', $setting);
    }

    public function update(Request $request)
    {
        $information = $request->except('_token', '_method', 'school_logo');
        try {

            foreach ($information as $info => $value) {

                Setting::where('key', $info)->update(['value' => $value]);
            }
            if ($request->hasFile('logo')) {
                $old_img = $request->school_logo;
                $name = $request->file('logo')->getClientOriginalName();
                $request->file('logo')->storeAs('attachments/logo/' . $name, $request->file('logo')->getClientOriginalName(), 'upload_attachments');
                Storage::disk('upload_attachments')->delete('attachments/logo/' . $old_img);
                Setting::where('key', 'school_logo')->update(['value' => $name]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        //return $information;
    }
}
