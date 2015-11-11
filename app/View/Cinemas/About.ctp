<?php

echo __('<p>Name : ' ); 
echo ('Mélanie Langevin');
echo __('<br/> For the course : ' );
echo ('420-267 MO Développer un site Web et une application pour Internet. <br/> Automne 2015, Collège Montmorency.');
echo __('<p>Option : <br/>');
echo __('<li>Enable upload Image : <b>Poster</b> for the table <b>Movie</b></li>');
echo __('<li>Dynamic Selectbox : <b>Movie</b> depends of <b>Rating</b> in <b>Showing</b></li>');
echo __('<li>Autocomplete : <b>Studio</b> for Add/Edit for <b>Movie</b></li></p>');
echo __("<p>When you're not activated you can't : </p>");
echo __("<p>For an <b>admin</b> :");
echo __('<li>Add new User</li></p>');
echo __("<p>For an <b>gerant</b> :");
echo __("<li>Add/Edit/Delete Showing</li>");
echo __("<li>Add/Edit/Delete Movies</li>");
echo __("<li>Add/Edit/Delete </li></p>");

echo __('<p><br/>Schema of the database : ');
echo __($this->Html->link('Click here for the original ', 'http://www.databaseanswers.org/data_models/cinema_bookings/index.htm'));
echo('<br/></p>');
echo $this->Html->image('modelbd.gif');