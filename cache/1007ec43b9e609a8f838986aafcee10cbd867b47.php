<?php $__env->startSection('content'); ?><p>An unsecured database belonging to Microsoft's Bing mobile app left more than 100 million user records exposed online. </p>

<p>Security experts say this was a Meow attack, where hackers scrapped the database with location coordinates and search queries that can be used in blackmail attacks and phishing scams.</p>

<p>The team spotted search results for child pornography and gun-related terms referencing to shootings and 'kill commies.'</p>

<p>Researchers with Wizcase say 'it is safe to speculate that anyone who has made a Bing search with the mobile app while the server has been exposed is at risk.'</p>

<p>Scroll down for video </p>

<p>An unsecured database belonging to Microsoft's Bing mobile app left more than 100 million user records exposed online. Security experts say this was a Meow attack, where hackers scrapped the database that included location coordinates and search queries that can be used in blackmail attacks and phishing scams</p>

<p>The database was discovered on September 12 without a password, but was secured four days later on September 16.</p>

<p>Wizcase, an online security research group, spotted the unprotected Microsoft-owned database, which they say was two days after the password had been removed.</p>

<p>The firm, led by white hacker Ata Hakcil, determined the server contained 6.5 terabytes of information and saw it increase by as much as 200 gigabytes each day.</p>

<p>Chase Williams, researcher with Wizcase, wrote in a blog post: 'Based on the sheer amount of data, it is safe to speculate that anyone who has made a Bing search with the mobile app while the server has been exposed is at risk.'</p>

<p>The unprotected database was discovered on September 12 without a password, but was secured four days later. The team found search results made by users looking for child pornography </p>

<p>'We saw records of people searching from more than 70 countries.'</p>

<p>'According to our scanner, the server was password protected until the first week of September. Our team discovered the leak on September 12th, approximately two days after the authentication was removed.'</p>

<p>Wizcase said they alerted Microsoft of the unprotected database on September 13, which then added a password September 16.</p>

<p>It appears the server was hit by a Meow attack, which searches for unsecured databases and wipes them clean.</p>

<p>Researchers with Wizcase say 'it is safe to speculate that anyone who has made a Bing search with the mobile app while the server has been exposed is at risk.' There were also a number of search terms for guns and others that showed interest in shootings to 'kill commies'</p>

<p>The team found that location data, search terms and other information was collected, but specifics like people's names and exact addresses were not in the database.</p>

<p>'While the coordinates exposed aren't precise, they still give a relatively small perimeter of where the user is located,' Williams wrote.</p>

<p>'By simply copying them on Google Maps, it could be possible to use them to trace back to the owner of the phone.'</p>

<p>However, the search queries found in the database could be used to blackmail users, as some were looking for child pornography and guns for interest in shootings.</p>

<p>'As ethical hackers, we don't have the resources to identify these people and turn them over to the authorities,' stated Williams.</p>

<p>'Yet, this discovery revealed how many predators and dangerous people are using search engines to find their next victims and what websites they are visiting.</p>

<p>Wizcase also notes that this data was 'exposed to all types of hackers and scammers.'</p>

<p>'This could lead to a variety of attacks against users of the Bing mobile app.'</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>