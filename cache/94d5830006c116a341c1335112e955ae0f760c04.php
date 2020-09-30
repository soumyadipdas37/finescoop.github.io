<?php $__env->startSection('content'); ?><p>More than 50,000 driver's licences have been leaked online, sparking warnings from experts that hackers can use the information to apply for credit cards and loans.</p>

<p>Ukrainian security consultant Bob Diachenko stumbled upon the folder of PDF and JPG files containing 108,535 scanned images of over 54,000 NSW licences.</p>

<p>He also discovered another folder containing Roads and Maritime Services toll notice statutory declarations. </p>

<p>The data was stored on an Amazon cloud storage service and contained phone numbers, addresses and birth dates – all of which were available for public view. </p>

<p>'More than 50K scanned driver licenses (front+back) and toll notices exposed in a misconfigured S3 bucket,' Mr Diachenko tweeted along with a screenshot of a list of files dated back to 2018.</p>

<p>'Most likely - part of NSW RMS infrastructure (Road and Maritime, New South Wales, Australia). Secured now.' </p>

<p>The data was stored on an Amazon cloud storage service and contained phone numbers, addresses and birth dates – all of which were available for public view</p>

<p>Ukrainian security consultant Bob Diachenko stumbled upon the folder of PDF and JPG files containing 108,535 scanned images of more than 50,000 driver's licences</p>

<p>Mr Diachenko labelled the mysterious data leak a 'dangerous exposure,' and said the files had most likely been seen by 'malicious actors' who could have made a copy of already. </p>

<p>'A malicious actor can impersonate somebody and apply for credit, or do something on behalf of that person,' he said.</p>

<p>'For example, you take one licence and connect the dots with one owner of this licence, with his or her emails exposed in another data breach and you've got more information on that person.'</p>

<p>IDcare security counsellor Christine Jackson said driver's licence theft is 'the golden ticket' for scammers because they are often used to verify identities by Centrelink, phone companies and banks.</p>

<p>'So often that will be telephone accounts, mobile phones are purchased, they might purchase iPads, tablets and things like that as well - so it can rack up to a lot of money,' she told the ABC.</p>

<p>'They'll also apply for credit cards, personal loans and they'll just keep going until your credit history is in a mess and they can't go any further. </p>

<p>'And then they'll lay low for a while, wait for you to clean it up when you find out what's gone on, and then they'll reinvest in that compromised document.' </p>

<p>Ms Jackson said brazen criminals even steal licences from victims' letterboxes after being sent to their homes from Roads and Maritime Services.</p>

<p>Scams reported to the ACCC involving identity theft or the loss of personal or banking information cost Australians at least $16 million last year.</p>

<p>Four in 10 Scamwatch reports in 2019 involved attempts to gain information or the actual loss of victims' information.</p>

<p>Some of the ways scammers obtain personal or banking information are through direct requests for scans of driver's licenses or passports, often in dating and romance scams. </p>

<p>Fraudsters can empty victims' bank accounts, take out thousands of dollars in bank loans under victims' names, and even purchase furniture or electronics under 'no-repayments for 12 months' schemes</p>

<p>Fraudsters can empty victims' bank accounts, take out thousands of dollars in bank loans under victims' names, and even purchase furniture or electronics under 'no-repayments for 12 months' schemes.</p>

<p>Security researcher Troy Hunt believes the source of the leak could be a fleet or toll road operator.</p>

<p>'The presence of toll notices [in the leak] is probably a bit of a clue and suggests it's more likely that it's a toll operator, or a fleet operator,' he told Car Advice. </p>

<p>Mr Hunt said the nature of the breach would be 'trivial' for anyone with a solid amount of technological knowledge to uncover.</p>

<p>'You don't have to be at Bob's level, but if you're someone who likes to crawl around the internet looking for this stuff [it would be possible] – I'm concerned about someone who makes a concerted effort to find it,' he said. </p>

<p>'It was open to public view which was obviously the concerning thing and it's unclear how long it was open for public view.'    </p>

<p>The source of the uploaded files remains unknown, but it's understood those affected by the breach are yet to be contacted. </p>

<p>Transport for NSW said in a statement they do not retain or collect tolling data, and said it is working with Cyber Security NSW to investigate.     </p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>