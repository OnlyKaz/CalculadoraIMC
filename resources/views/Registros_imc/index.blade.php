<!-- resources/views/Registros_imc/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Registros IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        h1 {
            color: #333;
        }
        .success-message {
            color: #28a745;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .add-button {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
            display: inline-block;
        }
        .add-button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        td form {
            display: inline;
        }
        .action-buttons a, .action-buttons button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
        }
        .edit-button {
            background-color: #ffc107;
        }
        .edit-button:hover {
            background-color: #e0a800;
        }
        .delete-button {
            background-color: #dc3545;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <h1>Listado de Registros IMC</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <a href="{{ route('Registros_imc.create') }}" class="add-button">Agregar Nuevo Registro</a>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Número de Identificación</th>
                <th>Programa Académico</th>
                <th>Peso (kg)</th>
                <th>Altura (cm)</th>
                <th>IMC</th>
                <th>Fecha del Examen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($imcRecords as $record)
                <tr>
                    <td>{{ $record->nombre }}</td>
                    <td>{{ $record->edad }}</td>
                    <td>{{ $record->sexo }}</td>
                    <td>{{ $record->numero_identificacion }}</td>
                    <td>{{ $record->programa_academico }}</td>
                    <td>{{ number_format($record->peso, 1) }} kg</td>
                    <td>{{ number_format($record->altura, 1) }} cm</td>
                    <td>{{ number_format($record->imc, 2) }}</td>
                    <td>{{ $record->fecha_examen }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('Registros_imc.edit', $record->id) }}" class="edit-button">Editar</a>
                        <form action="{{ route('Registros_imc.destroy', $record->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">Borrar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">No hay registros disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
