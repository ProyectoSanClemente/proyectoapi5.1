<script type="text/javascript">
    $(document).ready(function() {
        $('#usuariosldap').DataTable();
    } );
</script>


<h2>{{count($ldapusuarios)}} Usuarios LDAP</h2>
<table id="usuariosldap" class="table">
    <thead>
        <th>Accountname</th>
        <th>AccountType</th>
        <th>Display Name</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Grupo</th>
        <th>Email</th>    
    </thead>
    <tbody>
    
    @foreach ($ldapusuarios as $user)
        <tr>
            <td>{!! $user->getAccountName() !!}</td>
            <td>{!! $user->getAccountType() !!}</td>
            <td>{!! $user->getDisplayName() !!}</td>
            <td>{!! $user->getFirstName() !!}</td>
            <td>{!! $user->getLastName() !!}</td>
            <td>{!! $user->getPrimaryGroupId() !!}
            <td>{!! 'test  :'.$user->getAccountName().'@sanclemente.cl'!!}
        </tr>
    @endforeach
    </tbody>
</table>


<h2>{{count($ldapgrupos)}} Grupos</h2>

<table class="table">
    <thead>
        <th>Group Name</th>
        <th>Miembros</th>
        <th>Apellido</th>
        <th>Grupo</th>
    </thead>
    <tbody>
    @foreach ($ldapgrupos as $grupo)
        <tr>
            <td>{!! $grupo->getName() !!}</td>>
            <td>{{ count($grupo->getMembers()) }}</td>
            <td>{{ $grupo->getPrimaryGroupId() }}</td>
            
        </tr>
    @endforeach
    </tbody>
</table>
