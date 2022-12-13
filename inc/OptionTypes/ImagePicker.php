namespace UnysonOptionsBuilder\OptionTypes;

use Exception;
use UnysonOptionsBuilder\Core\OptionAbstract;
use UnysonOptionsBuilder\Core\ValidatedOption;

/**
 * This class defines an `ImagePicker` option type for a configuration framework.
 * It allows users to choose an image from a predefined palette of images.
 */
class ImagePicker extends OptionAbstract
{
    /**
     * An instance of the `ValidatedOption` class, which is used to validate the
     * selected image before it is set as the option value.
     *
     * @var ValidatedOption
     */
    protected ValidatedOption $validator;

    /**
     * The constructor method initializes the `ImagePicker` instance by creating a
     * new `ValidatedOption` instance and storing it in the `$validator` property.
     */
    public function __construct()
    {
        $this->validator = new ValidatedOption();
    }

    /**
     * Sets the selected image for the `ImagePicker` instance.
     *
     * @param array $value An array representing the selected image.
     *
     * @return ImagePicker The `ImagePicker` instance with the updated image value.
     * @throws Exception If the provided value is not in the correct format.
     */
    public function withValue($value): ImagePicker
    {
        if (!$this->validator->isValueValid($value)) {
            throw new Exception('Incorrect value format. Example format: (string) $key => (bool) $value');
        }

        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'image-picker';
    }
}


