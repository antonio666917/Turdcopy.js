root = exports ? this

class this.TurdApp
	constructor: (@document, @$) ->
		@$ ->
			console.log 'Turd is plopping'
		this.populate()
	populate: ->
		@$('[data-blurb-id]').click ->
			$('#turd-sidebar textarea').val($(@).text())
			$('#turd-sidebar input').val($(@).data('blurb-id'));



class this.TurdControl

	constructor: (@$)->
		console.log(@$)

	attr: 
		id: null
		text: null
		comment: null

	test: ->
		@.get_copy_string 'copyIdentifier'

	get_copy_string: (id) ->
		@.attr.id = id
		@.do_function_call id, 'get_copy_string'

	set_copy_string : (id, text) ->
		@.attr.id = id
		@.attr.text = text
		@.do_function_call id, 'set_copy_string'

	do_function_call: (id, the_function) ->
		@$.ajax
			type: "POST"
			url: "php/turd/controller.php"
			dataType: "JSON"
			data:
				'_the_function': the_function
				'_params': @attr
			success: (res) ->
				console.log(res)
			error: (res) ->
				console.log(res)
