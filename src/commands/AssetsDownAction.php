<?php namespace fortrabbit\Copy\commands;


/**
 * Class AssetsDownAction
 *
 * @package fortrabbit\Copy\commands
 */
class AssetsDownAction extends ConsoleBaseAction
{

    /**
     * Download Assets
     *
     * @param string|null $app
     *
     * @return bool
     */
    public function run(string $app = null)
    {
        // Ask if not forced
        $this->isForcedOrConfirmed("Do you really want to sync upload your local assets? to ...");


        die('SOME CALLED ME!!');
        return true;
    }
}
