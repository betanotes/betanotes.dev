<footer class="footer">
    {{-- Laptop view of footer --}}
    <div class="container hidden-sm hidden-xs text-center">
        <p class="text-muted"><em>
        	<span class="footerword">
        		<a href="https://github.com/ZeshanNSegal">Z</a>
        		<a href="https://github.com/anthony87burns">T</a>
        		<a href="https://github.com/Rwilkins1">R</a></span> | 
        	<span><a href="{{{ action('HomeController@about') }}}">About</a></span> |
        	<span class="footerword">Careers</span> | 
        	<span class="footerword">Legal</span> | 
        	<span class="footerword">Terms of Use</span> | 
        	<span class="footerword">Privacy</span> | 
        	<span class="footerword">Contact</span> 
        </em></p>
    </div> {{-- End laptop view of footer --}}

    {{-- Mobile view of footer --}}
    <div class="container hidden-md hidden-lg text-center">
        <p class="text-muted"><em>
            <span class="footerword">
                <a href="https://github.com/ZeshanNSegal">Z</a>
                <a href="https://github.com/anthony87burns">T</a>
                <a href="https://github.com/Rwilkins1">R</a></span> |

            <span><a href="{{{ action('HomeController@about') }}}">About</a></span>| 

            <span class="footerword">Terms &amp; Privacy</span> | 
            <span class="footerword">Contact</span> 
        </em></p>
    </div> {{-- End mobile view of footer --}}

</footer>