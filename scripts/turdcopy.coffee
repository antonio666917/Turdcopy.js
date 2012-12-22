root = exports ? this

class this.TurdApp
	constructor: (@document, @$) ->
		@control = new TurdControl(@$)
		@$ ->
			console.log 'Turd is plopping'
			
			console.log 'let\'s inject the sidebar ok'
			sideBarMarkup = ['<aside id="turd-sidebar"><h2>Edit</h2><input type="text" placeholder="String ID" disabled/><textarea></textarea><button class="btn btn-large btn-primary pull-right">Save</button><button class="turd-toggle"><i class="icon-chevron-left"></i></button></aside>']
			sideBarCSSInclusion = ['<link rel="stylesheet" href="../styles/css/main.css">'];
			$('body').append(sideBarCSSInclusion).append(sideBarMarkup)

		@.populate()
		@control.test()
	populate: ->
		@$('[data-blurb-id]').click ->
			$('#turd-sidebar textarea').val($(@).text())
			$('#turd-sidebar input').val($(@).data('blurb-id'));

class this.TurdControl

	constructor: (@$)->

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
				_the_function: the_function
				_params: @attr
			success: (res) ->
				console.log(res)
			error: (res) ->
				console.log(res)
