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



