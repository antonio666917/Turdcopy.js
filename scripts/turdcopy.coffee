root = exports ? this

class this.TurdApp

	constructor: (@document, @$, @options) ->
		@control = new TurdControl(@$)
		@populate()
		#Document Ready, place all DOM code here
		@$ ->
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
					<textarea class="edit-text"></textarea>
					<button class="btn btn-large btn-primary pull-right">Save</button>
					<button class="toggle-turd"><i class="icon-chevron-right"></i></button>
				</aside>']

			sideBarCSSInclusion = ['<link rel="stylesheet" href="../styles/main.css">'];
			$('body').append(sideBarCSSInclusion).append(sideBarMarkup)

			# Sidebar toggle functionality
			$('.toggle-turd').on 'click', ->
				$('#turd-sidebar').toggleClass('open');

	populate: ->
		control = @control
		update_sidebar = @update_sidebar
		$('[data-blurb-id]').unbind('click').click ->
			element = $(@)

			sidebar  = $('#turd-sidebar');

			if typeof element.data('blurb-id') == 'object'

				new_options = ''

				$.each element.data('blurb-id'), (index, value) ->
					new_options += '<option value="' + value + '">' + value + '</option>';

				sidebar.find('#multiple-blurb-ids').html new_options
				sidebar.find('#multiple-blurb-ids').show()

				sidebar.find('#multiple-blurb-ids').change ->
					control.get_copy_string $(@).val(), update_sidebar



			else
				sidebar.find('textarea').val(element.text())
				sidebar.find('#multiple-blurb-ids').hide()
				console.log element.data('blurb-id')
				sidebar.find('#edited-blurb-id').text(element.data('blurb-id'));



			# /$('#turd-sidebar input').val(element.data('blurb-id'));
			sidebar.find('textarea').unbind().keyup ->
				newText = $('#turd-sidebar textarea').val().replace(/&/g, '&amp;').replace(/>/g, '&gt;').replace(/</g, '&lt;').replace(/"/g, '&quot;').replace(/\n\r?/g, '<br />')
				$(element).text(newText)

			if !sidebar.hasClass('open')
			 	sidebar.addClass('open')

			sidebar.find('.btn-primary').unbind('click').click ->
				if confirm 'Are you sure you want to save this new copy?'
					control.set_copy_string element.data('blurb-id'), sidebar.find('textarea').val(), (res) ->
						console.log 'copy changed', res

	update_sidebar: (@attr)->
		sidebar  = $('#turd-sidebar');
		sidebar.find('textarea').val(@attr.text)


class this.TurdControl
	constants:
		ACTIVE_CLASS: 'editable-turd'

	constructor: (@$, @callbacks)->


	attr:
		id: null
		text: null
		comment: null

	test: ->
		@.get_copy_string 'copyIdentifier'

	get_copy_string: (id, callback) ->
		@.attr.id = id
		@.do_function_call id, 'get_copy_string', callback

	set_copy_string : (id, text, callback) ->
		@.attr.id = id
		@.attr.text = text
		@.do_function_call id, 'set_copy_string', callback

	do_function_call: (id, the_function, callback) ->
		@$.ajax
			type: "POST"
			url: "../php/turd/controller.php"
			dataType: "JSON"
			data:
				_the_function: the_function
				_params: @attr
			success: (res) ->
				callback res
			error: (res) ->
				console.log(res)

	setElement: (element) ->
		if @element and @element.hasClass @constants.ACTIVE_CLASS
			@element.removeClass @constants.ACTIVE_CLASS

		@element = element
		@element.addClass @constants.ACTIVE_CLASS

