<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>F1 Simples</title>
</head>
<body>

    <h1>F1 Central</h1>

    <form action="{{ isset($team_edit) ? route('teams.update', $team_edit->id) : route('teams.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Equipe" value="{{ $team_edit->name ?? '' }}" required>
        <input type="text" name="country" placeholder="País" value="{{ $team_edit->country ?? '' }}" required>
        <button type="submit">{{ isset($team_edit) ? 'Salvar Alteração' : 'Cadastrar Equipe' }}</button>
        @if(isset($team_edit)) <a href="{{ route('main') }}">Cancelar</a> @endif
    </form>

    <hr>

    <form action="{{ isset($pilot_edit) ? route('pilots.update', $pilot_edit->id) : route('pilots.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Piloto" value="{{ $pilot_edit->name ?? '' }}" required>
        <input type="number" name="number" placeholder="Nº" value="{{ $pilot_edit->number ?? '' }}" required>
        <select name="team_id" required>
            <option value="">Equipe...</option>
            @foreach($teams as $team)
                <option value="{{ $team->id }}" {{ (isset($pilot_edit) && $pilot_edit->team_id == $team->id) ? 'selected' : '' }}>
                    {{ $team->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">{{ isset($pilot_edit) ? 'Salvar Alteração' : 'Cadastrar Piloto' }}</button>
        @if(isset($pilot_edit)) <a href="{{ route('main') }}">Cancelar</a> @endif
    </form>

    <hr>

    <table border="1">
        <thead>
            <tr>
                <th>Piloto</th>
                <th>Equipe</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pilots as $pilot)
            <tr>
                <td>{{ $pilot->name }} ({{ $pilot->number }})</td>
                <td>{{ $pilot->team->name ?? '---' }}</td>
                <td>
                    <a href="{{ route('pilots.edit', $pilot->id) }}">Editar</a> | 
                    <a href="{{ route('pilots.delete', $pilot->id) }}">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <ul>
        @foreach($teams as $team)
            <li>
                {{ $team->name }} 
                <a href="{{ route('teams.edit', $team->id) }}">[Editar]</a>
                <a href="{{ route('teams.delete', $team->id) }}">[Deletar]</a>
            </li>
        @endforeach
    </ul>

</body>
</html>