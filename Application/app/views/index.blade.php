
				<tbody>
				  @foreach ($users as $user)
				    <td>{{ $user->id }}</td>
				    <td class="text-primary"><strong>{{ $user->name }}</strong></td>
				    <td>{{ link_to_route('user.show', 'Voir', array($user->id), array('class' => 'btn btn-success btn-block')) }}</td>
				    <td>{{ link_to_route('user.edit', 'Modifier', array($user->id), array('class' => 'btn btn-warning btn-block')) }}</td>
				    <td>
							{{ Form::open(array('method' => 'DELETE', 'route' => array('user.destroy', $user->id))) }}
								{{ Form::submit('Supprimer', array('class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')')) }}
							{{ Form::close() }}
				    </td>
				    </tr>
				  @endforeach
	  		</tbody>
