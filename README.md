# Attribute Customer

Add the following fields for customers to complete when registering:

1. Organization Name (Textfield)

2. Contact Phone Number including country code (Textfield)

3. Please select your Company Type (Dropdown)

- CBD Manufacturer

- CBD Brand and Marketing company

- CBD Extractor

- Other

If Other - please specify (1. Organization Name only appear if "Other" is selected )


# Construction step

1. add attribute to database & form fields
    - db_schema.xml
    - InstallData.php. UpgradeData.php
2. prepare data for attribute
    - Model, ResourceModel, Collection, Source, Helper
3. show attribute in Backend & Frontend web
    - view, Block
