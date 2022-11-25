<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function indexSubmitSma()
    {
        $user = Auth::user();
        return view('user.forms.submit_sma', ['user_id' => $user['id']]);
    }

    public function indexRetrieveSma()
    {
        $user = Auth::user();
        return view('user.forms.retrieve_sma', ['user_id' => $user['id']]);
    }

    public function indexRetrieveStis()
    {
        $user = Auth::user();
        return view('user.forms.retrieve_stis', ['user_id' => $user['id']]);
    }

    public function indexRequestSkAlumniStis()
    {
        $user = Auth::user();
        return view('user.forms.request_sk_alumni_stis', ['user_id' => $user['id']]);
    }

    public function indexRequestSuratPddikti()
    {
        $user = Auth::user();
        return view('user.forms.request_surat_pddikti', ['user_id' => $user['id']]);
    }

    public function getListFormAdmin()
    {
        $forms = Form::with('user')->orderBy('id', 'desc')->get()->toArray();

        return view('admin.form.index', ["forms" => $forms]);
    }

    public function getDetailForm($id)
    {
        $form = Form::where('id', $id)->with('user')->first()->toArray();

        return view('admin.form.detail', ["form" => $form]);
    }

    public function getListFormUser()
    {
        $user = Auth::user();

        $forms = Form::where('user_id', $user['id'])->orderBy('id', 'desc')->get()->toArray();

        return view('user.list_form', ["forms" => $forms]);
    }

    public function approveForm(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "approve" => "required|string|in:Diterima,Ditolak,Diserahkan",
            "reason" => "nullable"
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $fields = $validator->validated();

        Form::where('id', $id)->update($fields);
        return redirect()->intended(route('admin_form_list'));
    }

    public function submitSma(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "user_id" => "required",
            "nama" => "required",
            "nomor" => "required",
            "tanggal" => "required",
            "diwakilkan" => "nullable|string",
            "surat_kuasa" => "nullable|file|max:5120",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $fields = $validator->validated();

        $surat_kuasa = $request->file('surat_kuasa');
        $filename_surat_kuasa = null;
        if ($surat_kuasa) {
            $filename = $fields['user_id'] . '_suratkuasasubmitsma_' . strval(time()) . '.' . $surat_kuasa->getClientOriginalExtension();
            $surat_kuasa->move(public_path('images/uploads'), $filename);
            $filename_surat_kuasa = 'images/uploads/' . $filename;
        }

        Form::create([
            'type' => 'submitsma',
            'nama' => $fields['nama'],
            'nomor' => $fields['nomor'],
            'tanggal' => $fields['tanggal'],
            'diwakilkan' => $fields['diwakilkan'] == 'true' ? true : false,
            'surat_kuasa' => $filename_surat_kuasa,
            'user_id' => $fields['user_id']
        ]);
        return redirect()->intended(route('list_form'));
    }

    public function retrieveSma(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "user_id" => "required",
            "nama" => "required",
            "nomor" => "required",
            "tanggal" => "required",
            "diwakilkan" => "nullable|string",
            "surat_kuasa" => "nullable|file|max:5120",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $fields = $validator->validated();

        $surat_kuasa = $request->file('surat_kuasa');
        $filename_surat_kuasa = null;
        if ($surat_kuasa) {
            $filename = $fields['user_id'] . '_suratkuasaretrievesma_' . strval(time()) . '.' . $surat_kuasa->getClientOriginalExtension();
            $surat_kuasa->move(public_path('images/uploads'), $filename);
            $filename_surat_kuasa = 'images/uploads/' . $filename;
        }

        Form::create([
            'type' => 'retrievesma',
            'nama' => $fields['nama'],
            'nomor' => $fields['nomor'],
            'tanggal' => $fields['tanggal'],
            'diwakilkan' => $fields['diwakilkan'] == 'true' ? true : false,
            'surat_kuasa' => $filename_surat_kuasa,
            'user_id' => $fields['user_id']
        ]);
        return redirect()->intended(route('list_form'));
    }

    public function retrieveStis(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "user_id" => "required",
            "nama" => "required",
            "tanggal" => "required",
            "ikatan_dinas" => "nullable|string",
            "bukti" => "nullable|file|max:5120",
            "diwakilkan" => "nullable|string",
            "pengambil" => "nullable|string",
            "surat_kuasa" => "nullable|file|max:5120",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $fields = $validator->validated();

        $surat_kuasa = $request->file('surat_kuasa');
        $filename_surat_kuasa = null;
        if ($surat_kuasa) {
            $filename = $fields['user_id'] . '_suratkuasaretrievestis_' . strval(time()) . '.' . $surat_kuasa->getClientOriginalExtension();
            $surat_kuasa->move(public_path('images/uploads'), $filename);
            $filename_surat_kuasa = 'images/uploads/' . $filename;
        }

        $bukti = $request->file('bukti');
        $filename_bukti = null;
        if ($bukti) {
            $filename = $fields['user_id'] . '_buktiretrievestis_' . strval(time()) . '.' . $bukti->getClientOriginalExtension();
            $bukti->move(public_path('images/uploads'), $filename);
            $filename_bukti = 'images/uploads/' . $filename;
        }

        Form::create([
            'type' => 'retrievestis',
            'nama' => $fields['nama'],
            'tanggal' => $fields['tanggal'],
            'ikatan_dinas' => $fields['ikatan_dinas'],
            'bukti' => $filename_bukti,
            'diwakilkan' => $fields['diwakilkan'] == 'true' ? true : false,
            'pengambil' => $fields['pengambil'],
            'surat_kuasa' => $filename_surat_kuasa,
            'user_id' => $fields['user_id']
        ]);
        return redirect()->intended(route('list_form'));
    }

    public function requestSkAlumniStis(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "user_id" => "required",
            "tanggal" => "required",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $fields = $validator->validated();

        $user = User::where('id', $fields['user_id'])->first();

        Form::create([
            'type' => 'requestskalumnistis',
            'nama' => $user['name'],
            'tanggal' => $fields['tanggal'],
            'user_id' => $fields['user_id']
        ]);
        return redirect()->intended(route('list_form'));
    }

    public function requestSuratPddikti(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "user_id" => "required",
            "tanggal" => "required",
            "ttl" => "required",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $fields = $validator->validated();

        $user = User::where('id', $fields['user_id'])->first();

        Form::create([
            'type' => 'requestsuratpddikti',
            'nama' => $user['name'],
            'ttl' => $fields['ttl'],
            'tanggal' => $fields['tanggal'],
            'user_id' => $fields['user_id']
        ]);
        return redirect()->intended(route('list_form'));
    }
}
