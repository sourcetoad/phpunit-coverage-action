# Sourcetoad - PHPUnit Code Coverage
Automate pass/fail of a code coverage report based on a minimum percent.

## Usage
### Inputs

Following inputs can be used as `step.with` keys

| Name                   | Required | Type    | Description                                    |
|------------------------|----------|---------|------------------------------------------------|
| `clover_report_path`   | Yes      | String  | Path to clover report.                         |
| `min_coverage_percent` | Yes      | Number  | Minimum expected coverage percent.             |
| `fail_build_on_under`  | Yes      | Boolean | Whether to fail the build if coverage too low. |

 * `clover_report_path` is in context to project root.

### Outputs
| Name               | Description           |
|--------------------|-----------------------|
| `coverage_percent` | Code coverage percent |

### Example usage
```yaml
- name: Code Coverage Check
  uses: sourcetoad/phpunit-coverage-action@v1
  with:
      clover_report_path: output.xml
      min_coverage_percent: 80
      fail_build_on_under: true
```

### Testing

 * This action is actively tested with itself.
 * The sample folder contains a very basic PHP application with testing.
 * The `.github/workflows` talks to the exact copy of the action on that run.
 * It runs the sample application through the workflow twice with an intentional pass/fail option.
