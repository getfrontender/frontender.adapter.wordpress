<?php

declare(strict_types=1);

namespace Frontender\Platform\Model\Wordpress;

use Slim\Container;

class CategoriesModel extends AbstractModel
{
	public function __construct( Container $container ) {
		parent::__construct( $container );

		$this->getState()
			->insert('hide_empty')
			->insert('slug');
	}

	public function getPropertyPosts(): array {
		$postsModel = $this->getModel('PostsModel');
		$postsModel->setState([
			'categories' => [$this['id']]
		]);

		return $postsModel->fetch();
	}
}