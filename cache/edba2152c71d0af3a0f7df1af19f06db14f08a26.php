<?php $__env->startSection('content'); ?><p>An algorithm makes self-driving cars 'accident-proof' as long as other human drivers on the road act responsibly, scientists claim.  </p>

<p>German researchers developed the algorithm with data collected from vehicles in the real-world and tested it in computer simulations.  </p>

<p>Assuming that other traffic drivers follow the rules of the road, the algorithm can take into account unexpected events, such as the appearance of cyclists. </p>

<p>Autonomous vehicles can only be widely adopted once they can be trusted to drive more safely than human drivers. </p>

<p>Therefore, teaching them how to respond to unique situations to the same capability as a human will be crucial to their full roll out. </p>

<p>An algorithm that helps to ensure that autonomous vehicles drive safely is described by experts at Technical University of Munich</p>

<p>'Our technique serves as a safety layer for existing motion planning frameworks that provide intended trajectories for autonomous vehicles,' say the study authors from the Technical University of Munich.</p>

<p>'The benefits of our verification technique are demonstrated in critical urban scenarios, which have been recorded in real traffic. </p>

<p>'The autonomous vehicle executed only safe trajectories, even when using an intended trajectory planner that was not aware of other traffic participants. </p>

<p>'Our results indicate that our online verification technique can drastically reduce the number of traffic accidents.' </p>

<p>The benefit of self-driving cars is they do not have the ability to lose concentration or become fatigued like human drivers. </p>

<p>Although self-driving cars cannot be trained on all possible traffic situations, they can be provided with a framework that always calculates an accident-free trajectory. Intended trajectories (black line) are usually planned by only considering the most likely behaviours (grey lines) of other traffic participants. Fail-safe trajectories are collision-free against the set of all legal behaviours (blue areas) of other traffic participants</p>

<p>However, humans are much better at responding quickly and appropriately to a multitude of unique situations that a self-driving car may never have been programmed to recognise.</p>

<p>Although self-driving cars cannot be trained on all possible traffic situations, they can be provided with a framework that calculates an accident-free trajectory. </p>

<p>The researchers' algorithm ensures that the autonomous vehicle will not cause accidents, regardless of its trajectory. </p>

<p>Assuming that other road users drive legally, the algorithm can calculate safe plans to fall back on, should an unexpected event occur. </p>

<p>The authors tested this approach with computer simulations of real traffic situations that were recorded in urban scenarios and replayed to the algorithm, including a left-turn at an urban intersection.</p>

<p>'Left turns at intersections are among the most hazardous manoeuvres, because the autonomous vehicle must consider the right of way of oncoming vehicles and yield to potential cyclists in their dedicated lane, the researchers say. </p>

<p>They found that the algorithm did not suggest any unsafe routes at any point.     </p>

<p>The researchers admitted that autonomous vehicles are involved in accidents that are no fault of the technology – such as when a following car 'deliberately provokes a rear-end collision'.</p>

<p>However, self-inflicted accidents 'can and should be eliminated', they say. </p>

<p>Left turns at intersections are among the most hazardous manoeuvres, because the autonomous vehicle must consider the right of way of oncoming vehicles and yield to potential cyclists in their dedicated lane</p>

<p>The researchers have also presented a formal verification technique for guaranteeing legal safety in urban traffic situations.   </p>

<p>The notable downside of the algorithm is there is road users – both drivers and pedestrians – often do not behave responsibly on roads. </p>

<p>'The system’s assumption that other road users will always behave legally could potentially lead to collisions that a different system, based more on how road users actually behave, would prevent,' said Dr Ron Chrisley at the University of Sussex's Centre for Cognitive Science, who was not involved with the study. </p>

<p>'Saying that a collision wasn’t strictly caused by the autonomous vehicle will be of cold comfort to the families of accident victims in cases where the autonomous vehicle could have avoided the collision if it had taken predictable but non-legal driving and walking behaviour of others into account.'  </p>

<p>There may also be some unintended dangers of restricting the autonomous vehicle to legal trajectories only. </p>

<p>Safety continues to be a major challenge for autonomous vehicles, which have undergone multiple trials globally. Some self-driving cars have been involved in human fatalities</p>

<p>'This will clearly give the wrong result in any situation where, say, a harmless Highway Code infraction on the part of the autonomous vehicle could prevent a multi-vehicle collision involving multiple fatalities,' said Dr Chrisley.  </p>

<p>The study authors also 'oversell the real-world' usefulness of their algorithm, according to Noel Sharkey, professor of artificial intelligence and robotics at the University of Sheffield.</p>

<p>'It is all conducted in computer simulation that doesn't address the dynamics of the real world,' he said.</p>

<p>'It also makes the mistaken assumption that all other road users are obeying the rules of the road. </p>

<p>'While this is a useful project, considerably more work in the real world is required before it can be considered for certification.'</p>

<p>The study has been published in Nature Machine Intelligence.  </p>

<p>Self-driving cars have been taken to public roads as part of tests leading up to a full rollout – but some of these have had tragic consequences.   </p>

<p>In March 2018, for example, an autonomous Uber vehicle killed a female pedestrian crossing the street  in Tempe, Arizona in the US.</p>

<p>The Uber engineer in the vehicle was watching videos on her phone, according to reports at the time.   </p>

<p>Self-driving cars often use a combination of normal two-dimensional cameras and depth-sensing 'LiDAR' units to recognise the world around them.</p>

<p>However, others make use of visible light cameras that capture imagery of the roads and streets. </p>

<p>They are trained with a wealth of information and vast databases of hundreds of thousands of clips which are processed using artificial intelligence to accurately identify people, signs and hazards.   </p>

<p>In LiDAR (light detection and ranging) scanning - which is used by Waymo - one or more lasers send out short pulses, which bounce back when they hit an obstacle.</p>

<p>These sensors constantly scan the surrounding areas looking for information, acting as the 'eyes' of the car.</p>

<p>While the units supply depth information, their low resolution makes it hard to detect small, faraway objects without help from a normal camera linked to it in real time.</p>

<p>In November last year Apple revealed details of its driverless car system that uses lasers to detect pedestrians and cyclists from a distance.</p>

<p>The Apple researchers said they were able to get 'highly encouraging results' in spotting pedestrians and cyclists with just LiDAR data.</p>

<p>They also wrote they were able to beat other approaches for detecting three-dimensional objects that use only LiDAR.</p>

<p>Other self-driving cars generally rely on a combination of cameras, sensors and lasers. </p>

<p>An example is Volvo's self driving cars that rely on around 28 cameras, sensors and lasers.</p>

<p>A network of computers process information, which together with GPS, generates a real-time map of moving and stationary objects in the environment.</p>

<p>Twelve ultrasonic sensors around the car are used to identify objects close to the vehicle and support autonomous drive at low speeds.</p>

<p>A wave radar and camera placed on the windscreen reads traffic signs and the road's curvature and can detect objects on the road such as other road users.</p>

<p>Four radars behind the front and rear bumpers also locate objects.</p>

<p>Two long-range radars on the bumper are used to detect fast-moving vehicles approaching from far behind, which is useful on motorways.</p>

<p>Four cameras - two on the wing mirrors, one on the grille and one on the rear bumper - monitor objects in close proximity to the vehicle and lane markings. </p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>