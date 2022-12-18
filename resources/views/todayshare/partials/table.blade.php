<tr>
    <td>{{++$key}}</td>
    <td>{{ $todayshare->date }}</td>
    <td>{{ $todayshare->price }}</td>
    <td>
        @if($todayshare->date == date('Y-m-d'))
            <a href="{{route('todayshare.edit', $todayshare->id)}}"  class="btn btn-icon-toggle btn-sm" title="edit">
                <i class="mdi mdi-pencil"></i>
            </a>
            <button type="button" class="btn btn-icon-toggle" onclick="deleteThis(this); return false;" link="{{route('todayshare.delete', $todayshare->id) }}">
                <i class="far fa-trash-alt"></i>
            </button>
        @endif
    </td>
</tr>

