<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = [
            'app_name' => Setting::get('app_name', 'Wilaya Oujda-Angad'),
            'timezone' => Setting::get('timezone', 'Africa/Casablanca'),
            'language' => Setting::get('language', 'Français'),
            'email_notifications' => Setting::get('email_notifications', true),
            'event_reminders' => Setting::get('event_reminders', true),
            'system_updates' => Setting::get('system_updates', false),
            'two_factor' => Setting::get('two_factor', false),
        ];

        return view('parametres', compact('settings'));
    }

    public function update(Request $request)
    {
        Setting::set('app_name', $request->app_name);
        Setting::set('timezone', $request->timezone);
        Setting::set('language', $request->language);
        Setting::set('email_notifications', $request->email_notifications ? true : false);
        Setting::set('event_reminders', $request->event_reminders ? true : false);
        Setting::set('system_updates', $request->system_updates ? true : false);
        Setting::set('two_factor', $request->two_factor ? true : false);

        return redirect()->back()->with('success', 'Paramètres mis à jour avec succès !');
    }
}
