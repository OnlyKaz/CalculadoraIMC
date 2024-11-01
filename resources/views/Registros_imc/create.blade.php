<!-- resources/views/imc_records/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Registro de IMC</title>
    <!-- Incluye estilos CSS, si los tienes -->
</head>
<body>
    <h1>Registrar nuevo IMC</h1>

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

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div>
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" value="{{ old('edad') }}" required>
        </div>

        <div>
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
        </div>

        <div>
            <label for="numero_identificacion">Número de Identificación:</label>
            <input type="text" id="numero_identificacion" name="numero_identificacion" value="{{ old('numero_identificacion') }}" required>
        </div>

        <div>
            <label for="programa_academico">Programa Académico:</label>
            <input type="text" id="programa_academico" name="programa_academico" value="{{ old('programa_academico') }}" required>
        </div>

        <div>
            <label for="peso">Peso (kg):</label>
            <input type="number" id="peso" name="peso" step="0.01" value="{{ old('peso') }}" required>
        </div>

        <div>
            <label for="altura">Altura (cm):</label>
            <input type="number" id="altura" name="altura" step="0.01" value="{{ old('altura') }}" required>
        </div>

        <button type="submit">Guardar Registro</button>
    </form>

</body>
</html>
