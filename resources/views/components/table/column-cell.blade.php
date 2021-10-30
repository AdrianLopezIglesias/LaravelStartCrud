@if($link)
<td>
	<a href="	{{ $link }}">
		{{ $column }}
	</a>
</td>
@else
<td>		{{ $column }}</td>
@endif