<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estudiantes</title>
</head>
<body>
    <h1>Lista de Estudiantes</h1>

    <h2>Agregar nuevo estudiante</h2>
    <form action="{{ route('students.insert') }}" method="POST">
        @csrf
        <input type="text" name="cedula" placeholder="Cédula" required>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="text" name="direccion" placeholder="Dirección" required>
        <input type="text" name="telefono" placeholder="Teléfono" required>
        <button type="submit">Agregar</button>
    </form> 

    <h2>Estudiantes registrados</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante['id'] }}</td>
                    <td>{{ $estudiante['cedula'] }}</td>
                    <td>{{ $estudiante['nombre'] }}</td>
                    <td>{{ $estudiante['apellido'] }}</td>
                    <td>{{ $estudiante['direccion'] }}</td>
                    <td>{{ $estudiante['telefono'] }}</td>
                    {{-- <td>
                        <a href="{{ route('estudiantes.edit', $estudiante['cedula']) }}">Editar</a>
                        <form action="{{ route('estudiantes.destroy', $estudiante['cedula']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>