<div id="disqus_thread"></div>
<script>
	var disqus_config = function () {
	this.page.url = "{{ url($post->path()) }}";  
	this.page.identifier = "post-{{ $post->slug }}"; variable
	};

	(function() { 
	var d = document, s = d.createElement('script');
	s.src = 'https://engr-1.disqus.com/embed.js';
	s.setAttribute('data-timestamp', +new Date());
	(d.head || d.body).appendChild(s);
	})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            