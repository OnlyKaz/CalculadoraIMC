<!-- resources/views/imc_records/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Registro de IMC</title>
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
        /* Botón de enviar */
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

    <h1>Registrar Nuevo IMC</h1>

    <div class="form-container">
        <!-- Muestra los errores de validación si existen -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('Registros_imc.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" value="{{ old('edad') }}" required>
            </div>

            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="numero_identificacion">Número de Identificación:</label>
                <input type="text" id="numero_identificacion" name="numero_identificacion" value="{{ old('numero_identificacion') }}" required>
            </div>

            <div class="form-group">
                <label for="programa_academico">Programa Académico:</label>
                <input type="text" id="programa_academico" name="programa_academico" value="{{ old('programa_academico') }}" required>
            </div>

            <div class="form-group">
                <label for="peso">Peso (kg):</label>
                <input type="number" id="peso" name="peso" step="0.01" value="{{ old('peso') }}" required>
            </div>

            <div class="form-group">
                <label for="altura">Altura (cm):</label>
                <input type="number" id="altura" name="altura" step="0.01" value="{{ old('altura') }}" required>
            </div>

            <button type="submit">Guardar Registro</button>
        </form>
    </div>

</body>
</html>
