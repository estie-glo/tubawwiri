<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: 'Work Sans', Arial, sans-serif; background-color: #F6F1E4; padding: 30px 0; margin: 0;">
    <div style="max-width: 560px; margin: 0 auto; background: #ffffff; border: 1px solid #e5ddc8;">

        <div style="background-color: #123D2E; padding: 24px 30px;">
            <p style="color: #C99A3E; font-size: 11px; letter-spacing: 2px; text-transform: uppercase; margin: 0 0 6px 0;">Fondation TUBAWWIRI (TBW)</p>
            <p style="color: #ffffff; font-size: 18px; font-weight: 600; margin: 0;">{{ $formTitle }}</p>
        </div>

        <div style="padding: 30px;">
            <table style="width: 100%; border-collapse: collapse;">
                @foreach ($fields as $label => $value)
                    <tr>
                        <td style="padding: 10px 0; border-bottom: 1px solid #e5ddc8; color: #6B2A28; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; width: 40%; vertical-align: top;">
                            {{ $label }}
                        </td>
                        <td style="padding: 10px 0; border-bottom: 1px solid #e5ddc8; color: #211D16; font-size: 14px; vertical-align: top;">
                            {{ $value ?: '—' }}
                        </td>
                    </tr>
                @endforeach
            </table>

            <p style="margin-top: 24px; font-size: 12px; color: #8a8372;">
                Reçu le {{ now()->format('d/m/Y à H:i') }} · Connectez-vous à l'admin pour traiter cette demande.
            </p>
        </div>
    </div>
</body>
</html>
