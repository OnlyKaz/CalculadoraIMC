<!-- resources/views/Registros_imc/edit.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro IMC</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 20px;
            color: #333;
        }
        h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        /* Contenedor del formulario */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }
        /* Estilo de alerta de error */
        .alert-danger {
            color: #dc3545;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .alert-danger ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }
        .alert-danger li {
            margin: 5px 0;
        }
        /* Botón de actualizar */
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <h1>Editar Registro IMC</h1>

    <div class="form-container">
        <!-- Muestra errores de validación si existen -->
        @if($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de edición -->
        <form action="{{ route('Registros_imc.update', $record->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $record->nombre) }}" required>
            </div>

            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" value="{{ old('edad', $record->edad) }}" required>
            </div>

            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" required>
                    <option value="Masculino" {{ old('sexo', $record->sexo) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ old('sexo', $record->sexo) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                    <option value="Otro" {{ old('sexo', $record->sexo) == 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="numero_identificacion">Número de Identificación:</label>
                <input type="text" id="numero_identificacion" name="numero_identificacion" value="{{ old('numero_identificacion', $record->numero_identificacion) }}" required>
            </div>

            <div class="form-group">
                <label for="programa_academico">Programa Académico:</label>
                <input type="text" id="programa_academico" name="programa_academico" value="{{ old('programa_academico', $record->programa_academico) }}" required>
            </div>

            <div class="form-group">
                <label for="peso">Peso (kg):</label>
                <input type="number" id="peso" name="peso" step="0.1" value="{{ old('peso', $record->peso) }}" required>
            </div>

            <div class="form-group">
                <label for="altura">Altura (cm):</label>
                <input type="number" id="altura" name="altura" step="0.1" value="{{ old('altura', $record->altura) }}" required>
            </div>

            <button type="submit">Actualizar</button>
        </form>
    </div>

</body>
</html>
