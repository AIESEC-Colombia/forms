<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexVoluntary()
    {
        $lists = config('list');
        return view('forms.global_volunteer', [
            'universities' => getUniversities(),
            'travel_date' => $lists['lists']['travel_date'],
            'preference_contact' => $lists['lists']['preference_contact'],
            'organization' => $lists['voluntary']['organization'],
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexVoluntaryAds()
    {
        $lists = config('list');
        return view('forms.global_volunteer_ads', [
            'universities' => getUniversities(),
            'travel_date' => $lists['lists']['travel_date'],
            'preference_contact' => $lists['lists']['preference_contact'],
            'organization' => $lists['voluntary']['organization'],
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexTalent()
    {
        $lists = config('list');
        return view('forms.global_talent', [
            'universities' => getUniversities(),
            'semester' => $lists['lists']['semester'],
            'career' => $lists['lists']['career'],
            'english_level' => $lists['lists']['english_level'],
            'travel_date' => $lists['lists']['travel_date'],
            'preference_contact' => $lists['lists']['preference_contact'],
            'experience' => $lists['lists']['experience'],
            'activities' => $lists['lists']['activities'],
            'organization' => $lists['entrepreneurship']['organization'],
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexTalentAds()
    {
        $lists = config('list');
        return view('forms.global_talent_ads', [
            'universities' => getUniversities(),
            'semester' => $lists['lists']['semester'],
            'career' => $lists['lists']['career'],
            'english_level' => $lists['lists']['english_level'],
            'travel_date' => $lists['lists']['travel_date'],
            'preference_contact' => $lists['lists']['preference_contact'],
            'experience' => $lists['lists']['experience'],
            'activities' => $lists['lists']['activities'],
            'organization' => $lists['talent']['organization'],
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexEntrepreneurship()
    {

        $lists = config('list');

        return view('forms.global_entrepreneurship', [
            'universities' => getUniversities(),
            'semester' => $lists['lists']['semester'],
            'career' => $lists['lists']['career'],
            'english_level' => $lists['lists']['english_level'],
            'travel_date' => $lists['lists']['travel_date'],
            'preference_contact' => $lists['lists']['preference_contact'],
            'experience' => $lists['lists']['experience'],
            'activities' => $lists['lists']['activities'],
            'organization' => $lists['talent']['organization'],
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexEntrepreneurshipAds()
    {
        $lists = config('list');
        return view('forms.global_entrepreneurship_ads', [
            'universities' => getUniversities(),
            'semester' => $lists['lists']['semester'],
            'career' => $lists['lists']['career'],
            'english_level' => $lists['lists']['english_level'],
            'travel_date' => $lists['lists']['travel_date'],
            'preference_contact' => $lists['lists']['preference_contact'],
            'experience' => $lists['lists']['experience'],
            'activities' => $lists['lists']['activities'],
            'organization' => $lists['entrepreneurship']['organization'],
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            try {

                getItemPodio($request);

                preg_match('/<meta name="csrf-token" content="(.*)" \/>/', initCurl(), $matches);
                $gis_token = substr(explode(' ', $matches[1])[0], 0, -1);

                $fields = getFieldsExpa($request, $gis_token);


                $fields_string = "";
                foreach ($fields as $key => $value) {
                    $fields_string .= $key . '=' . urlencode($value) . '&';
                }

                rtrim($fields_string, '&');

                $response = initCurlAutentication($fields, $fields_string);

                return response()->json(['response' => $response ?? null]);


            } catch (\Exception $e) {
                \Log::error('fallo al crear el objeto de podio' . $e);
            }

        }
    }
}
