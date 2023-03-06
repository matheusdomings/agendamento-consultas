<?php

namespace App\Http\Controllers;

use App\Models\Schedules;
use App\Models\User;
use App\Notifications\ScheduleNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Define o agendamento
        $schedule = new Schedules();
        $dataReturn = ['success' => false, 'message' => false];

        if($request->date_consult < date('Y-m-d')){
            $dataReturn['message'] = 'Não é possível agendar para os dias anteriores!';
            return $dataReturn;
        }

        // Preenche os dados do agendamento
        $schedule->patient_id = Auth::user()->id;
        $schedule->doctor_id = $request->doctor_id;
        $schedule->date_consult = $request->date_consult.' '.$request->hour_consult;
        $schedule->status = 1;

        // Salva no banco
        if($schedule->save()){
            // Envia a notificação
            Notification::send(User::findOrFail($request->doctor_id), new ScheduleNotification("Uma nova consulta foi agendada!", $schedule));
            // Retorno
            $dataReturn['success'] = true;
            $dataReturn['message'] = 'Consulta marcada com sucesso!';
        }

        // Retorno
        return response()->json($dataReturn);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function show(Schedules $schedules)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedules $schedules)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedules $schedules)
    {
        $dataReturn = ['success' => false, 'message' => false];
        
        // Busca os dados do agendamento
        $schedule = DB::table('schedules')->where('id', $request->id)->first();
        
        // Atualiza o status do agendamento
        $scheduleUpdate = DB::table('schedules')->where('id', $request->id)->update(['status' => 0]);
        if(!empty($scheduleUpdate)){
            // Envia a notificação para o usuário que a consulta foi cancelada e a mensagem
            Notification::send(User::findOrFail($schedule->patient_id), new ScheduleNotification($request->message, $schedule));
            $dataReturn['success'] = true;
            $dataReturn['message'] = 'Consulta cancelada com sucesso!';
        }

        return response()->json($dataReturn);
    }

    public function updateByPatient(Request $request)
    {
        $dataReturn = ['success' => false, 'message' => false];
        
        // Busca os dados do agendamento
        $schedule = DB::table('schedules')->where('id', $request->id)->first();
        
        // Atualiza o status do agendamento
        $scheduleUpdate = DB::table('schedules')->where('id', $request->id)->update(['status' => 0]);
        if(!empty($scheduleUpdate)){
            // Envia a notificação para o usuário que a consulta foi cancelada e a mensagem
            Notification::send(User::findOrFail($schedule->doctor_id), new ScheduleNotification('Uma consulta foi cancelada!', $schedule));
            $dataReturn['success'] = true;
            $dataReturn['message'] = 'Consulta cancelada com sucesso!';
        }

        return response()->json($dataReturn);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedules $schedules)
    {}
}
