<?php
    class VisitorExtension extends DataExtension implements RequestFilter
    {
        private static $has_one = array (
            'Visitor' => 'Visitor'
        );

        public function contentControllerInit( $controller )
        {
        }

        public function preRequest( SS_HTTPRequest $request, Session $session, DataModel $model )
        {
        }

        public function postRequest( SS_HTTPRequest $request, SS_HTTPResponse $response, DataModel $model )
        {
            if  ( ! $response->isError() && ! Director::is_ajax() )
            {
                // Find or create the visitor record
                    $visitor = Visitor::initVisitor();

                // Log the arrival of this visitor to this page
                    $visitor->logPageArrival();
            }
        }
    }
