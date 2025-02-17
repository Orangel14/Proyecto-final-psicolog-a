<x-mail::message>
    <table style="width: 100%; background-color: #f4f4f4; padding: 20px;">
        <tr>
            <td>
                <table style="max-width: 600px; width: 100%; margin: 0 auto; background-color: #ffffff; padding: 20px; border: 1px solid #e0e0e0;">
                    <tr>
                        <td style="text-align: center;">
                            <img src="{{ asset('assets/img/psicologia.svg') }}" alt="psicologia" style="width: 120px; margin-bottom: 20px; border-radius: 50%;">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Arial, sans-serif; text-align: center; color: #333333;">
                            <h1 style="font-size: 24px; color: #333333;">Restablecimiento de Contraseña</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Arial, sans-serif; color: #333333; line-height: 1.5; padding: 0 10px;">
                            <p>Estimado/a,</p>
                            <p>Ha solicitado restablecer su contraseña para acceder al <strong></strong>.</p>
                            <p>Por favor, haga clic en el botón a continuación para restablecer su contraseña:</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; padding: 20px 0;">
                            <!-- Botón de restablecimiento -->
                            <a href="{{ $url }}" style="background-color: #007bff; color: #ffffff; padding: 10px 20px; text-decoration: none; font-size: 16px; border-radius: 5px;">Restablecer Contraseña</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Arial, sans-serif; color: #888888; text-align: center; font-size: 12px; padding-top: 20px;">
                            <p>Si no solicitó este restablecimiento, puede ignorar este correo con seguridad.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <!-- Imagen adicional -->
                            <img src="{{ asset('assets/img/diseno4.png') }}" alt="" style="width: 120px; margin-top: 20px;">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Arial, sans-serif; color: #888888; text-align: center; font-size: 12px; padding-top: 20px;">
                            <p>Gracias,<br>Atentamente PsicoVirtual</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</x-mail::message>
