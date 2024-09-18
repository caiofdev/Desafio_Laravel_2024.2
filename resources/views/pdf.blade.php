<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Contas</title>
</head>

<body style="font-size: 12px;">
    <h1 style="text-align: center">Vertex Financial</h1>
    <p style="text-align: center; font-style: italic;">Hello dear {{$user->name}}, this is your account statement for the last 10 transactions made.</p>
    <p style="text-align: center; font-style: italic;">Best regards, Vertex Financial Team.</p>
    <p style="text-align: center; font-style: italic;">Contact: admin@vertexfinancial.com</p>
    <h2 style="text-align: center">Extract</h2>

    <table style="border-collapse: collapse; width: 100%;">
        
        <thead>
            <tr style="background-color: #adb5bd;">
                <th style="border: 1px solid #ccc;">ID</th>
                <th style="border: 1px solid #ccc;">Name</th>
                <th style="border: 1px solid #ccc;">Value</th>
                <th style="border: 1px solid #ccc;">Date</th>
                <th style="border: 1px solid #ccc;">Sender</th>
                <th style="border: 1px solid #ccc;">Receiver ID</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($transactions as $transaction)
                <tr>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $transaction->id }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $transaction->title }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ '$ ' . number_format($transaction->value, 2, ',', '.') }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $transaction->created_at }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $user->name }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $transaction->receiver_id }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No records found.</td>
                </tr>
            @endforelse

        </tbody>
    </table>
</body>
</html>
