<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Process\Process;

class Install extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$process = new Process('composer search '.$this->argument('package'));
		$process->setTimeout(3600);
		$process->run();

		$names = array_values(array_unique(array_filter(explode(PHP_EOL, $process->getOutput()))));
		if(!$names)
			return $this->error('Packege not found');

		if(count($names) > 1)
		{
			$this->info('Select package');
		
			foreach($names as $i => $name)
			{
				$this->line(($i + 1).' ) '.$name);
			}
			$numb = (int)$this->ask('Select package: ') - 1;
			if(!array_key_exists($numb, $names))
				return $this->error('Выбор не верный');
			
			$name = $names[$numb];
		}
		else
		{
			$name = $names[0];
		}
		list($name) = explode(' ', $name);
		
		$process = new Process('composer show '.$name);
		$process->setTimeout(3600);
		$process->run();

		$output = $process->getOutput();
		$info = array();
		foreach(explode(PHP_EOL, $process->getOutput()) as $line)
		{
			if(strpos($line, ':') === false) break;
			list($kay, $val) = explode(':', $line);
			$info[trim($kay)] = trim($val);
		}
		$versions = explode(', ', $info['versions']);
		$versions = array_map('trim', $versions);
		if(count($versions) > 1)
		{
			$this->info('Select version');
		
			foreach($versions as $i => $version)
			{
				$this->line(($i + 1).' ) '.$version);
			}
			$numb = (int)$this->ask('Select version: ') - 1;
			if(!array_key_exists($numb, $versions))
				return $this->error('Выбор не верный');
			
			$version = $versions[$numb];
		}
		else
		{
			$version = $versions[0];
		}

		$process = new Process('composer require '.$name.':'.$version);
		$process->setTimeout(3600);
		$process->run();
		$this->line($process->getOutput());
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('package', InputArgument::REQUIRED, 'Package name.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
