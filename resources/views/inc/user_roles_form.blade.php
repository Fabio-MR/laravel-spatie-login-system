<div class="form-group">
    <div class="card border">
        <div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em;">
            Funções de Usuário
        </div>
        <div class="card-body">
            <table id="roles" class="table table-striped table-hover table-responsive-sm table-sm compact">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Nome da Guarda</th>
                        <th>Criado</th>
                        <th>Ativo</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td>{{ $role->created_at->toFormattedDateString() }}</td>
                        <td><input type="checkbox" name="roles[]" id="{{ $role->id }}" value="{{ $role->id }}" @if(isset($user) && $user->hasRole($role->name)) checked @endif></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Nome da Guarda</th>
                        <th>Criado</th>
                        <th>Ativo</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
