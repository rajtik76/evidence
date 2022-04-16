<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    /**
     * Switch language
     */
    public function switch(string $language): RedirectResponse
    {
        session()->put('locale', $language);

        return redirect()->back();
    }
}
