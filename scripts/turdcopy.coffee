root = exports ? this

class this.TurdApp
	constructor: (@document, @$, @options) ->
		@control = new TurdControl(@$, @options.callbacks)
		@populate()

		#Document Ready, place all DOM code here
		@$ ->
			console.log 'fuck you julian, and let\'s load the fucking sidebar'
			sideBarMarkup = ['
			<button class="btn btn-success toggle-turd"><i class="icon-edit icon-white"></i></button>
				<aside id="turd-sidebar">
					<h3>Edit</h3>
					<h4 id="edited-blurb-id">Default blurb ID</h4>
					<select id="multiple-blurb-ids">
						<option selected>Default blurb ID</option>
						<option>Second blurb ID</option>
						<option>Third blurb ID</option>
					</select>
					<textarea></textarea>
					<button class="btn btn-primary btn-small pull-right">Save</button>

					<button class="toggle-turd"><i class="icon-chevron-right"></i></button>
				</aside>']

			sideBarCSSInclusion = ['<link rel="stylesheet" href="../styles/main.css">'];
			$('body').append(sideBarCSSInclusion).append(sideBarMarkup)

			# Sidebar toggle functionality
			$('.toggle-turd').on 'click', ->
				$('#turd-sidebar').toggleClass('open');

	populate: ->
		control = @control
		$('[data-blurb-id]').unbind('click').click ->
			element = $(@)
			sidebar = $('#turd-sidebar')

			sidebar.find('#edited-blurb-id').text(element.data('blurb-id'))
			sidebar.find('textarea').val(element.text())
			sidebar.find('textarea').unbind().keyup ->
				newText = $('#turd-sidebar textarea').val()
				$(element).text(newText)

			$('#turd-sidebar').addClass('open') if !$('#turd-sidebar').hasClass('open')

			sidebar.find('.btn-primary').click ->
				control.set_copy_string element.data('blurb-id'), sidebar.find('textarea').val() if confirm 'Are you sure you want to save this new copy?'



class this.TurdControl

	constructor: (@$, @callbacks)->
		console.log(@callbacks)

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
			url: "../php/turd/controller.php"
			dataType: "JSON"
			data:
				_the_function: the_function
				_params: @attr
			success: (res) ->
				console.log(res)
			error: (res) ->
				console.log(res)
