@props([
	'rows' => [],
	'columns' => [],
	'striped' => false,
	'actionText' => 'Action',
	'tableTextLinkLabel' => 'Link',
])

<div 
	x-data="{
		columns: {{ collect($columns) }},
		rows: {{ collect($rows) }},
		isStriped: Boolean({{ $striped }})
	}"
	x-cloak
	wire:key="{{ md5(collect($rows)) }}" // for livewire
>
	<div class="table-responsive">          
		<table class="table">
			<thead>
				<tr class="">
					@isset($tableColumns)
						{{ $tableColumns }}
					@else	 
						@isset($tableTextLink)
							<th class="">
								{{ $tableTextLinkLabel }}
							</th>
						@endisset

						<template x-for="column in columns">
							<th 
								:class="`${column.columnClasses}`"
								class="" 
								x-text="column.name"></th>
						</template>

						{{-- Displays when Custom name slots for action links is shown --}}
						@isset($tableActions)
							<th class="">{{ $actionText }}</th>
						@endisset
					@endisset
				</tr>
			</thead>
			<tbody>

				<template x-if="rows.length === 0">
					@isset($empty)
						{{ $empty }}
					@else
						<tr>
							<td colspan="100%" class="">
								No records found
							</td>
						</tr>
					@endisset
				</template>

				<template x-for="(row, rowIndex) in rows" :key="'row-' +rowIndex">
					<tr >
						@isset($tableRows)
							{{ $tableRows }}
						@else
							@isset($tableTextLink)
								<td
									class="">
									{{ $tableTextLink }}
								</td>
							@endisset

							<template x-for="(column, columnIndex) in columns" :key="'column-' + columnIndex">
								<td 
									:class="`${column.rowClasses}`"
									class="">
									<div x-text="`${row[column.field]}`" class="truncate"></div>
								</td>
							</template>

							{{-- Custom name slots for action links --}}
							@isset($tableActions)
								<td
									class="">
									{{ $tableActions }}
								</td>
							@endisset
						@endisset
					</tr>
				</template>

			</tbody>
		</table>
	</div>
</div>