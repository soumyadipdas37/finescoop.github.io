<?php $__env->startSection('content'); ?><p>Recording the telltale sound your key makes when you insert it into its lock could allow eavesdropping hackers to clone your key, researchers have demonstrated.</p>

<p>Built by experts from Singapore, the SpiKey software uses the clicks made as a lock's pins pass over its key's teeth into narrow down the possible key shapes for a door.</p>

<p>Criminals could use similar software after surreptitiously recording you with a smartphone as you unlock your home — and return later having cut a new key.</p>

<p>Alternatively, the team said, hackers could hijack your own phone or smart doorbell, and use it to record the key sound without being physically present themselves. </p>

<p>The attack — which could potentially be being used by criminals — only works on pin tumbler locks, with normally-less-secure warded locks immune to the approach. </p>

<p>Scroll down for video </p>

<p>Recording the telltale sound your key makes when you insert it into its lock could allow eavesdropping hackers to clone your key, researchers have demonstrated (stock image)</p>

<p>The inside of many modern locks features a cylinder, or 'plug', that must be turned in order for the door to be unlocked.</p>

<p>They also contain a series of paired, spring-loaded pins that ordinarily block the rotation of the plug, keeping the mechanism locked.</p>

<p>Only when each pair of pins is raised to the correct height — such that the divide between them lies on the edge of the plug — will the cylinder turn.</p>

<p>This is achieved by inserting the correct key, whose ridges — in a pattern referred to the key's 'bitting' — serve to push the pins to the right height.</p>

<p>However, it is this design that makes such locks vulnerable, the researchers found, because inserting the key makes faint but revealing clicking noises as each pin slides up and down over the key's ridges. </p>

<p>'When a victim inserts his/her key into the lock, the emitted sound is captured by the attacker’s microphone,' computer scientist Soundarya Ramesh and colleagues of the National University of Singapore wrote in their paper.</p>

<p>'SpiKey leverages the time difference between audible clicks to ultimately infer the bitting information — i.e. the shape of the physical key.'</p>

<p>By analysing the key insertion sound, SpiKey can narrow down the possible combination of teeth making up the bitting to a limited number that could then each be cut and tried in the target door until the hacker succeeds in opening the lock.</p>

<p>Only when each pair of pins (shown in blue and red) in a tumbler lock is raised to the correct height — such that the divide between them lies on the edge of the plug (shown in yellow) — will the latter turn. This is achieved by inserting the correct key, whose ridges — in a pattern referred to the key's 'bitting' — serve to push the pins to the right height, as pictured</p>

<p>This design makes such locks vulnerable, the researchers found, because inserting the key makes faint but revealing clicking noises as each pin slides up and down over the key's ridges</p>

<p>'On average, SpiKey is able to provide 5.10 candidate keys guaranteeing inclusion of the correct victim key — from a total of 330,424 [possible] keys,' the team wrote.</p>

<p>'With 3 candidate keys being the most frequent case,' they added.</p>

<p>As the researchers note,  the advantage of this for the would-be criminal is that it is faster and less conspicuous to try a few keys on a target's door than to pick the lock — not to mention also requiring considerably less skill.</p>

<p>Built by experts from Singapore, the SpiKey software uses the clicks made as a lock's pins pass over its key's teeth into narrow down the possible key shapes for a door, as pictured0</p>

<p>The method does have a few limitations, the researchers note.</p>

<p>Firstly, SpiKey needs to know which type of pin tumbler lock the victim has — although this can often be determined by examining the outside of the lock.</p>

<p>Secondly, the software at present assumes that everyone always inserts keys into locks at the same speed — which is very likely not true in real-life.</p>

<p>However, the researchers think that they may be able to overcome this by combining recordings taken over a series of different key insertions. </p>

<p>The full findings of the study were published in the Proceedings of the 21st International Workshop on Mobile Computing Systems and Applications.</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>