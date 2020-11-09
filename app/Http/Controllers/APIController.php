<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Hero;
use App\Models\Punyahero;
use App\Models\Punyaskin;
use App\Models\Skin;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function getDataAkun()
    {
        $akun = Akun::orderBy('akunid', 'DESC')->get();
        return view('welcome', compact('akun'));
    }

    public function detailhero($AKUNID)
    {
        $hero = DB::table('punyahero')
            ->join('akun', 'akun.AKUNID', '=', 'punyahero.AKUNID')
            ->join('hero', 'hero.HEROID', '=', 'punyahero.HEROID')
            ->select('akun.AKUNID', 'hero.HERONAMA', 'hero.HEROID', 'hero.HEROHARGA')
            ->where('punyahero.AKUNID', '=', $AKUNID)
            ->get();

        $heroes = Hero::all();
        $aknid = Punyahero::select('AKUNID')
            ->where('punyahero.AKUNID', '=', $AKUNID)
            ->first();

//        $heroes = Punyahero::where('AKUNID', $AKUNID)->get();
//        $hero = Punyahero::where('AKUNID', $AKUNID)->find($HEROID)->hero;
//        $skin = Punyaskin::where('AKUNID', $AKUNID)->get();

        return view('detailhero', compact('hero', 'heroes', 'aknid'));
    }

    public function detailskin($AKUNID)
    {
        $skin = DB::table('punyaskin')
            ->join('akun', 'akun.AKUNID', '=', 'punyaskin.AKUNID')
            ->join('skin', 'skin.SKINID', '=', 'punyaskin.SKINID')
            ->select('akun.AKUNID', 'skin.SKINNAMA', 'skin.HEROID', 'skin.SKINID', 'skin.SKINHARGA')
            ->where('punyaskin.AKUNID', '=', $AKUNID)
            ->get();

        $skins = Skin::all();
        $aknid = Punyaskin::select('AKUNID')
            ->where('punyaskin.AKUNID', '=', $AKUNID)
            ->first();

        return view('detailskin', compact('skin','skins','aknid'));
    }

    public function tambahhero(Request $request)
    {
//        $request->validate([
//            'AKUNID' => 'required',
//            'HEROID' => 'required',
//        ]);
//
//        Punyahero::create($request->all());
//
//        return redirect()->route('dashboard');
        DB::table('punyahero')
            ->insert
            ([
                    'AKUNID' => $request->AKUNID,
                    'HEROID' => $request->HEROID,
            ]);

        return redirect()->route('dashboard');
//            ->with('success','Product created successfully.');
    }
    public function hapushero($HEROID)
    {
        DB::table('punyahero')
//            ->where('AKUNID', $AKUNID)
            ->where('HEROID', $HEROID)
            ->delete();
        return redirect()->route('dashboard');
    }

    public function tambahskin(Request $request)
    {
        DB::table('punyaskin')
            ->insert
            ([
                'AKUNID' => $request->AKUNID,
                'SKINID' => $request->SKINID,
            ]);

        return redirect()->route('dashboard');
//            ->with('success','Product created successfully.');
    }
    public function hapusskin($SKINID)
    {
        DB::table('punyaskin')
//            ->where('AKUNID', $AKUNID)
            ->where('SKINID', $SKINID)
            ->delete();
        return redirect()->route('dashboard');
    }


}
