<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Config::get('settings');

        return view('settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $newSettings = $request->except('_token');

        $oldSettings = Config::get('settings');
        $updatedSettings = array_merge($oldSettings, $newSettings);

        $settingsFile = base_path('config/settings.php');
        $content = '<?php' . PHP_EOL . 'return ' . var_export($updatedSettings, true) . ';';
        File::put($settingsFile, $content);

        return redirect()->route('settings.edit')->with('success', 'Les paramètres ont été mis à jour avec succès.');
    }
}
