<x-mail::message>
    <table style="width: 100%; background-color: #f4f4f4; padding: 20px; text-align: justify !important;" align="justify">
        <tr>
            <td>
                <table style="max-width: 600px; width: 100%; margin: 0 auto; background-color: #ffffff; padding: 20px; border: 1px solid #e0e0e0;">
                    <tr>
                        <td style="text-align: center !important;" align="center">
                            <img src="{{ asset('assets/img/diseno4.png') }}" alt="" style="width: 120px; margin-bottom: 20px; border-radius: 50%;">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Arial, sans-serif; text-align: center !important; color: #333333;">
                            <h1 style="font-size: 24px; color: #333333;">Verificación de Correo Electrónico</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Arial, sans-serif; color: #333333; line-height: 1.5; padding: 0 10px; text-align: justify !important;" align="justify">
                            <p style="text-align:justify !important;">Estimado/a, {{ $user->full_name }}</p>
                            <p style="text-align:justify !important;">Gracias por registrarse en el sistema del <strong>Psicologia</strong>. Para continuar con el registro y poder acceder a los servicios, es necesario verificar su dirección de correo electrónico.</p>
                            <p style="text-align:justify !important;">Por favor, haga clic en el siguiente botón para verificar su correo:</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center !important; padding: 20px 0;" align="center">
                            <a href="{{ $url }}" style="background-color: #007bff; color: #ffffff; padding: 10px 20px; text-decoration: none; font-size: 16px; border-radius: 5px;">Verificar correo</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Arial, sans-serif; color: #888888; text-align: center !important; font-size: 12px; padding-top: 20px; text-align: justify !important;" align="center">
                            <p style="text-align:justify !important;">Si no solicitó esta verificación, simplemente ignore este correo.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center !important;">
                            <img src="{{ asset('assets/img/diseno4.png') }}" alt="" style="width: 120px; margin-top: 20px;">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Arial, sans-serif; color: #888888; text-align: center !important; font-size: 12px; padding-top: 20px;" align="center">
                            <p style="text-align:justify !important;">Gracias,<br>Atentamente </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</x-mail::message>
