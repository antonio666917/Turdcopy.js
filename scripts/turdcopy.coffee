root = exports ? this

class this.TurdApp
	constructor: (@document, @$) ->
		@control = new TurdControl(@$)
		@$ ->
			console.log 'Turd is plopping'
			
			console.log 'let\'s inject the sidebar ok'
			sideBarMarkup = ['<button class="btn btn-medium btn-success toggle-turd"><i class="icon-edit icon-white"></i></button><aside id="turd-sidebar"><h3>Edit</h3><h4 id="edited-blurb-id">Default blurb ID</h4><select id="multiple-blurb-ids"><option selected>Default blurb ID</option><option>Second blurb ID</option><option>Third blurb ID</option></select><textarea></textarea><button class="btn btn-large btn-primary pull-right">Save</button><button class="toggle-turd"><i class="icon-chevron-left"></i></button></aside>']
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
