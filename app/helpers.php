<?php

use Illuminate\Http\Request;

/**
 * @param int $id
 * @return int
 */
function getCommittee(int $id): int
{
    $committees = [
        1395 => ['Comite' => "ANDES", 'ValorPodio' => 1],
        2052 => ['Comite' => "APC", 'ValorPodio' => 2],
        1868 => ['Comite' => "Armenia", 'ValorPodio' => 3],
        2018 => ['Comite' => "Bogota", 'ValorPodio' => 4],
        759 => ['Comite' => "BUCARAMANGA", 'ValorPodio' => 5],
        915 => ['Comite' => "CALI", 'ValorPodio' => 6],
        858 => ['Comite' => "CARTAGENA", 'ValorPodio' => 7],
        1737 => ['Comite' => "CENTRAL", 'ValorPodio' => 8],
        1738 => ['Comite' => "CUCUTA", 'ValorPodio' => 9],
        1198 => ['Comite' => "EAFIT", 'ValorPodio' => 10],
        509 => ['Comite' => "EAN", 'ValorPodio' => 11],
        1505 => ['Comite' => "ECI", 'ValorPodio' => 12],
        1858 => ['Comite' => "EXTERNADO", 'ValorPodio' => 13],
        1923 => ['Comite' => "FLORENCIA", 'ValorPodio' => 14],
        1165 => ['Comite' => "JAVERIANA", 'ValorPodio' => 15],
        1739 => ['Comite' => "JAVERIANA CALI", 'ValorPodio' => 16],
        661 => ['Comite' => "MANIZALES", 'ValorPodio' => 17],
        1832 => ['Comite' => "MC CO", 'ValorPodio' => 18],
        510 => ['Comite' => "MONTERIA", 'ValorPodio' => 19],
        1745 => ['Comite' => "NEIVA", 'ValorPodio' => 20],
        1756 => ['Comite' => "PASTO", 'ValorPodio' => 21],
        825 => ['Comite' => "PEREIRA", 'ValorPodio' => 22],
        1740 => ['Comite' => "Popayan", 'ValorPodio' => 23],
        1919 => ['Comite' => "Riohacha", 'ValorPodio' => 24],
        428 => ['Comite' => "ROSARIO", 'ValorPodio' => 25],
        1921 => ['Comite' => "SAN GIL", 'ValorPodio' => 26],
        1812 => ['Comite' => "Santa Marta", 'ValorPodio' => 27],
        1747 => ['Comite' => "SINCELEJO", 'ValorPodio' => 28],
        294 => ['Comite' => "TOLIMA", 'ValorPodio' => 29],
        1754 => ['Comite' => "TULUA", 'ValorPodio' => 30],
        1877 => ['Comite' => "TUNJA", 'ValorPodio' => 31],
        1746 => ['Comite' => "UdeA", 'ValorPodio' => 32],
        173 => ['Comite' => "UNIATLANTICO", 'ValorPodio' => 33],
        1469 => ['Comite' => "UNINORTE", 'ValorPodio' => 34],
        1479 => ['Comite' => "UPB", 'ValorPodio' => 35],
        172 => ['Comite' => "VALLEDUPAR", 'ValorPodio' => 36],
        1920 => ['Comite' => "Villavicencio", 'ValorPodio' => 37]
    ];

    return $committees[$id]["ValorPodio"];
}


/**
 * @return array|null
 */
function getUniversities(): array
{
    $data = json_decode(file_get_contents("https://gis-api.aiesec.org/v2/lists/mcs_alignments.json"));

    $colombia = collect($data)->filter(function ($item) {
        return $item->id == config('app.colombia_id');
    })->first();

    return $colombia->alignments ?? [];

}

function getItemPodio(Request $request)
{
    try {
        Podio::setup(config('app.podio_client_id'), config('app.podio_client_secret'));
        Podio::authenticate_with_app(config('app.podio_api_id'), config('app.podio_api_token'));

        if ($request->get('isVoluntary')) {
            $fields = new PodioItemFieldCollection([
                new PodioTextItemField(["external_id" => "titulo", "values" => $request->get('first_name')]),
                new PodioTextItemField(["external_id" => "lastname", "values" => $request->get('last_name')],
                    new PodioTextItemField(["external_id" => "phone-2", "values" => $request->get('phone')]),
                    new PodioTextItemField(["external_id" => "cellphone-2", "values" => $request->get('cellphone')]),
                    new PodioCategoryItemField(["external_id" => "email-2", "values" => $request->get('email')]),
                    new PodioCategoryItemField(["external_id" => "iduniversity", "values" => $request->get('university')]),
                    new PodioCategoryItemField(["external_id" => "university", "values" => $request->get('university_text')]),
                    new PodioCategoryItemField(["external_id" => "howmet-2", "values" => (int)$request->get('organization')]),
                    new PodioCategoryItemField(["external_id" => "fecha-de-viaje", "values" => (int)$request->get('travel_date')]),
                    new PodioCategoryItemField(["external_id" => "preferencia-de-contacto", "values" => (int)$request->get('preference_contact')]),
                    new PodioCategoryItemField(["external_id" => "lc", "values" => getCommittee((int)$request->get('university'))]))
            ]);
        } else {


            $fields = new PodioItemFieldCollection([
                new PodioTextItemField(["external_id" => "titulo", "values" => $request->get('first_name')]),
                new PodioTextItemField(["external_id" => "lastname", "values" => $request->get('last_name')],
                    new PodioTextItemField(["external_id" => "phone-2", "values" => $request->get('phone')]),
                    new PodioTextItemField(["external_id" => "cellphone-2", "values" => $request->get('cellphone')]),
                    new PodioCategoryItemField(["external_id" => "email-2", "values" => $request->get('email')]),
                    new PodioCategoryItemField(["external_id" => "iduniversity", "values" => $request->get('university')]),
                    new PodioCategoryItemField(["external_id" => "university", "values" => $request->get('university_text')]),
                    new PodioCategoryItemField(["external_id" => "howmet-2", "values" => (int)$request->get('organization')]),
                    new PodioCategoryItemField(["external_id" => "fecha-de-viaje", "values" => (int)$request->get('travel_date')]),
                    new PodioCategoryItemField(["external_id" => "preferencia-de-contacto", "values" => (int)$request->get('preference_contact')]),
                    new PodioCategoryItemField(["external_id" => "nivel-de-ingles", "values" => (int)$request->get('english_level')]),
                    new PodioCategoryItemField(["external_id" => "experiencia-de-trabajo", "values" => (int)$request->get('experience')]),
                    new PodioCategoryItemField(["external_id" => "carrera", "values" => $request->get('career_text')]),
                    new PodioCategoryItemField(["external_id" => "semestre", "values" => (int)$request->get('semester')]),
                    new PodioCategoryItemField(["external_id" => "worksfield", "values" => $request->get('activities')]),
                    new PodioCategoryItemField(["external_id" => "lc", "values" => getCommittee((int)$request->get('university'))]))
            ]);

        }


        $item = new PodioItem(array(
            'app' => new PodioApp(config('app.podio_api_id')),
            'fields' => $fields
        ));

        return $item->save();

    } catch (\Exception $e) {
        new Exception($e);
    }
}

function getFieldsExpa(Request $request, $gis_token): array
{
    return [
        'authenticity_token' => htmlspecialchars($gis_token),
        'user[email]' => $request->get('email'),
        'user[first_name]' => $request->get('first_name'),
        'user[last_name]' => $request->get('last_name'),
        'user[password]' => $request->get('password'),
        'user[phone]' => $request->get('cellphone'),
        'user[country]' => config('app.colombia_name'),
        'user[mc]' => config('app.colombia_id'),
        'user[lc_input]' => $request->get('university'),
        'user[lc]' => $request->get('university'),
        'commit' => 'REGISTER'
    ];
}

/**
 * @return bool|string
 */
function initCurl()
{
    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://auth.aiesec.org/users/sign_in',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));

        $result = curl_exec($curl);
        curl_close($curl);
        return $result;

    } catch (\Exception $e) {
        new Exception($e);
    }
}

/**
 * @return bool|string
 */
function initCurlAutentication($fields, $fields_string)
{
    try {
        $url = "https://auth.aiesec.org/users";
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_URL, $url);
        curl_setopt($ch2, CURLOPT_POST, count($fields));
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch2);

        $err = curl_error($ch2);
        curl_close($ch2);

        return $result;

    } catch (\Exception $e) {
        new Exception($e);
    }

}