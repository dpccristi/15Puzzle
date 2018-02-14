<li class="{{ Request::is('skills*') ? 'active' : '' }}">
    <a href="{!! route('skills.index') !!}"><i class="fa fa-edit"></i><span>Skills</span></a>
</li>

<li class="{{ Request::is('skillUsers*') ? 'active' : '' }}">
    <a href="{!! route('skillUsers.index') !!}"><i class="fa fa-edit"></i><span>Skill Users</span></a>
</li>

