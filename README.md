Dragonfly Search
===========

<p>Dragonfly is a research engine designed for students. Dragonfly has a mobile app, located at <a href="https://github.com/AlexFine/dragonfly">github.com/AlexFine/dragonfly</a> and a website is located at <a href="http://dragonflysearch.com">dragonflysearch.com</a>.
</p>

<h1>The main Dragonfly components</h1>
<ol>
<li><b>Website</b>: Dragonfly can be used by students at <a href="http://dragonflysearch.com">dragonfly.com</a>.</li>
    <li><b>App</b>: Dragonfly can be used on your phone with the Dragonfly app.</li>
    <li><b>Research</b>: Dragonfly is a research and learning opportunity for everyone involved. One of the major goals of Dragonfly is to learn more about natural language process and search technologies.  </li>
</ol>

<h1>How to use</h1>
<p>Right now Dragonfly needs help improving it's APIs. We currently only pull from Encyclopedia Britannica and the search algorithm checks for query overlap. In the short term we can use a more primitive statistical model that values sentences based on word infrequencies. This search method would rate words that don't appear often in common language as important and then setup the search method to include facts without the highest "importancy rating." Along the line however we'd like to develop a google page rank approach that mixes Google's linear algebra matrice style with that of standard natural language processing. We could use the google matrice approach to find a large amount of facts that are similar and relavent to the query. We can then sort those facts using two major values. The first is how important they would be using the regular algorithm, the second is how informative they are based on a the NLP output illustrated above. This system we believe would produce high quality and accurate results. On a seperate note, we still need to crawl more of Encyclopedia Britannica and would like to add in notes from other sources, such as the NYT or the Wall Street Journal.  </p>
<p>To edit the general search page, go to /search/ folder.</p>
<p>To edit the contents of the UI of the facts in the /resources/page/modules/ folder. </p>
<p>To edit the API's access them in the /api/ folder. </p>