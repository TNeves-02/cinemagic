<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class FaturaPaga extends Notification
{
    use Queueable;

    private $recibo;
    public function __construct($recibo)
    {
        $this->recibo = $recibo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('historico/' . $this->recibo->id );
        //$pdf = asset('/app/pdf_recibos/recibo'. $this->recibo->id .'.pdf');
        //$pdf = Storage::response('pdf_recibos/recibo'. $this->recibo->id .'.pdf');           

        return (new MailMessage)
                    ->line('Recibo nº: ' . $this->recibo->id)
                    ->line('Realizada em ' . $this->recibo->data)
                    ->line('Olá, ' . $this->recibo->cliente->user->name )
                    ->line('A sua compra foi finalizada através de ' . $this->recibo->tipo_pagamento . '.' )
                    ->line('Poderá ver a emissão do recibo no seguinte botão:')                
                    ->action('Recibo URL' , $url)
                    ->line('Este ficheiro também está disponível como anexo neste email.')                
                    ->line('Obrigado por escolher o Cinemagic e bons filmes.')            
                    ->attach(storage_path('app/pdf_recibos/recibo'. $this->recibo->id .'.pdf'), [
                        'mime' => 'application/pdf',
                    ]); 
                                      
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
