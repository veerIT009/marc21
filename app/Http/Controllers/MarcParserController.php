<?php

namespace App\Http\Controllers;

use Scriptotek\Marc\Record;
use Illuminate\Http\Request;
use Scriptotek\Marc\Collection;
use Illuminate\Support\Facades\Storage;

class MarcParserController extends Controller
{
    public function Parse(Request $request)
    {

        $collection = Collection::fromFile('test.mrc')->toArray();
        // dd($records);
        foreach ($collection as $record) {
            $data['isbn'] = $record->getField('020')->getSubField('a')->getData();
            $data['title'] = $record->getField('245')->getSubField('a')->getData();
            $data['edition'] = $record->getField('250')->getSubField('a')->getData();
            $data['publisher'] = $record->getField('260')->getSubField('a')->getData();
            $data['genre'] = $record->getField('665')->getSubField('a')->getData();
            $data['language'] = $record->getField('546')->getSubField('a')->getData();
            // $data['address'] = $record->getField('270')->getSubField('a');
            $data['description'] = $record->getField('300')->getSubField('a')->getData();
            var_dump($data);
        }
    }
}
