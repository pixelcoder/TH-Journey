<?php include_once('class/journey.php'); ?>

<?php
// Formatted array to be passed to 'journey' class, in the future this could be a file or api response
$boardingPasses = array(
	array(
		'pass' => array(
			'type' 		=> 'Train', 
			'details' 	=> array(
				'number' 	=> '78A',
				'from' 		=> 'Madrid',
				'to' 		=> 'Barcelona',
				'seat' 		=> '45B',
				'gate' 		=> null,
				'info' 		=> null
			)
		)
	), 
	array(
		'pass' => array(
			'type' 		=> 'Bus', 
			'details' 	=> array(
				'number' 	=> null,
				'from' 		=> 'Barcelona Airport',
				'to' 		=> 'Gerona Airport',
				'seat' 		=> null,
				'gate' 		=> null,
				'info' 		=> null
			)
		)
	),
	array(
		'pass' => array(
			'type' 		=> 'Flight', 
			'details' 	=> array(
				'number' 	=> 'SK455',
				'from' 		=> 'Gerona Airport',
				'to' 		=> 'Stockholm',
				'seat' 		=> '3A',
				'gate' 		=> '45B',
				'info' 		=> array(
					'type'		=> 'Baggage Drop',
					'counter'	=> '344',
					'message'	=> null
				)
			)
		)
	),
	array(
		'pass' => array(
			'type' 		=> 'Flight', 
			'details' 	=> array(
				'number' 	=> 'SK22',
				'from' 		=> 'Stockholm',
				'to' 		=> 'New York JFK',
				'seat' 		=> '7B',
				'gate' 		=> '22',
				'info' 		=> array(
					'type'		=> 'Baggage Return',
					'counter'	=> null,
					'message'	=> 'Automatically transferred to your last leg.'
				)
			)
		)
	)
);

$trip = new Journey();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1,minimum-scale=1,maximum-scale=1,width=device-width,user-scalable=no">
	<title>Journeys</title>
	<style>
		html {
			box-sizing: border-box;
			font-family: sans-serif;
		}
		*, *:before, *:after {
			box-sizing: inherit;
			margin: 0;
			padding: 0;
		}
		* {
			
		}
		body {
			background: #EEE;
			text-align: center;
		}
		h1 {
			margin: 20px 0 0 0;
			font-size: 24px;
		}
		ol {
			margin: 0 auto;
			max-width: 600px;
			width: 100%;
			padding: 10px;
		}
		li {
			display: block;
			text-align: left;
			margin-bottom: 36px;
			padding: 20px 20px 40px 20px;
			border: 4px solid #CCC;
			background: #FFF;
			position: relative;
		}
		li:after {
			position: absolute;
			bottom: -20px;
			left: 50%;
			transform: translateX(-50%);
			content: "THEN";
			background: #FFF;
			border: 2px solid #CCC;
			height: 40px;
			line-height: 36px;
			padding: 0 40px;
			font-size: 12px;
		}
		li:last-child:after {
			content: "Arrived";
		}
		p {
			margin-bottom: 10px;
		}
		p:last-child {
			margin-bottom: 0;
		}
		em {
			display: block;
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<h1>Journeys</h1>

	<?php $journeys = $trip->get_journey($boardingPasses); ?>

	<?php if(!empty($journeys)) : ?>

		<ol>

		<?php foreach($journeys as $journey) : ?>

			<li>
				<p>Take a <?php echo $journey['pass']['type']; ?> from <?php echo $journey['pass']['details']['from']; ?> to <?php echo $journey['pass']['details']['to']; ?>
				<?php if(!empty($journey['pass']['details']['seat'])) : ?>
					on seat <?php echo $journey['pass']['details']['seat']; ?>
				<?php endif; ?>
				<?php if(!empty($journey['pass']['details']['gate'])) : ?>
					via gate <?php echo $journey['pass']['details']['gate']; ?>
				<?php endif; ?>
				.
				<?php if(!empty($journey['pass']['details']['info']['type']) || !empty($journey['pass']['details']['info']['counter']) || !empty($journey['pass']['details']['info']['message'])) : ?>
				<em>
				<?php endif; ?>
					<?php if(!empty($journey['pass']['details']['info']['type'])) : ?>
						<?php echo $journey['pass']['details']['info']['type']; ?>
					<?php endif; ?>
					<?php if(!empty($journey['pass']['details']['info']['counter'])) : ?>
						@ Counter <?php echo $journey['pass']['details']['info']['counter']; ?>
					<?php endif; ?>
					<?php if(!empty($journey['pass']['details']['info']['message'])) : ?>
						<?php echo $journey['pass']['details']['info']['message']; ?>
					<?php endif; ?>
				<?php if(!empty($journey['pass']['details']['info']['type']) || !empty($journey['pass']['details']['info']['counter']) || !empty($journey['pass']['details']['info']['message'])) : ?>
				</em>
				<?php endif; ?>
				</p>
			</li>

		<?php endforeach; ?>

		</ol>

	<?php endif; ?>

</body>
</html>